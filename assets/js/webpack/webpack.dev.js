const devConfig = {
  mode: 'development',
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
};

module.exports = devConfig;
