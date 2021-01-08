const { merge } = require('webpack-merge');

const { commonConfig } = require('./webpack/webpack.common');
const devConfig = require('./webpack/webpack.dev');
const prodConfig = require('./webpack/webpack.prod');

module.exports = function ({ production }) {
  if (production) return merge(commonConfig, prodConfig);

  return merge(commonConfig, devConfig);
};
