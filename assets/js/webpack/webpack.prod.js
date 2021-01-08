const prodConfig = {
  mode: 'production',
  module: {
    rules: [
      {
        test: /\.tsx?$/i,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/env', '@babel/typescript'],
              plugins: [
                '@babel/proposal-class-properties',
                '@babel/proposal-object-rest-spread',
              ],
            },
          },
        ],
      },
    ],
  },
};

module.exports = prodConfig;
