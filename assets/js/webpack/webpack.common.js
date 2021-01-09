const { join, resolve } = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const PATHS = {
  dist: resolve(__dirname, '..', 'dist'),
  files: {
    css: join('..', '..', '..', '[name].css'),
    cssMin: join('..', '..', '..', '[name].min.css'),
    sass: resolve(__dirname, '..', '..', 'sass', 'style.scss'),
    ts: resolve(__dirname, '..', 'src', 'index.ts'),
  },
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
      filename: process.argv.includes('production')
        ? PATHS.files.cssMin
        : PATHS.files.css,
    }),
    new CleanWebpackPlugin(),
  ],
};

module.exports = { commonConfig, PATHS };
