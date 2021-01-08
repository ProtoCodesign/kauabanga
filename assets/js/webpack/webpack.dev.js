const devConfig = {
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.tsx?$/i,
        use: 'ts-loader',
        exclude: /node_modules/,
      },
    ],
  },
};

module.exports = devConfig;
