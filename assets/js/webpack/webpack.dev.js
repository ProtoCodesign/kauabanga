const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const { PATHS } = require('./webpack.common');

const devConfig = {
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.s(a|c)ss$/i,
        use: [
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              sassOptions: {
                outputStyle: 'expanded',
              },
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new BrowserSyncPlugin({
      ui: false,
      notify: false,
      proxy: process.argv[3].replace('proxy=', ''),
      port: 3000,
      files: [...PATHS.watch],
    }),
  ],
};

module.exports = devConfig;
