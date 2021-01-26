const { join, resolve } = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const PATHS = {
  dist: resolve(__dirname, '..', 'dist'),
  files: {
    css: join('..', '..', '..', '[name].css'),
    sass: resolve(__dirname, '..', '..', 'sass', 'style.scss'),
    ts: resolve(__dirname, '..', 'src', 'index.ts'),
  },
  watch: [
    resolve(__dirname, '..', '..', '..', '**', '*.php'),
    resolve(__dirname, '..', '..', '..', 'languages', '*.pot'),
  ],
};

const commonConfig = {
  entry: {
    index: PATHS.files.ts,
    style: PATHS.files.sass,
  },
  output: {
    filename: '[name].[chunkhash].js',
    path: PATHS.dist,
  },
  resolve: {
    extensions: ['.tsx', '.ts', '.js', '.scss', '.css'],
  },
  module: {
    rules: [
      {
        test: /\.tsx?$/i,
        use: 'ts-loader',
        exclude: /node_modules/,
      },
      {
        test: /\.s(a|c)ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
          },
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: PATHS.files.css,
    }),
    new CleanWebpackPlugin(),
  ],
};

module.exports = { commonConfig, PATHS };
