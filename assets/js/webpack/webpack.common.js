const { resolve } = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

const PATHS = {
  dist: {
    folder: resolve(__dirname, '..', 'dist'),
  },
  scripts: {
    ts: resolve(__dirname, '..', 'src', 'index.ts'),
  },
};

const commonConfig = {
  entry: {
    index: PATHS.scripts.ts,
  },
  output: {
    filename: '[name].[chunkhash].js',
    path: PATHS.dist.folder,
  },
  resolve: {
    extensions: ['.tsx', '.ts', '.js'],
  },
  plugins: [new CleanWebpackPlugin()],
};

module.exports = { commonConfig, PATHS };
