const path = require('path');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserJSPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

var defaultConfig = {
  mode: 'production',
  watch: true,

  optimization: {
    minimizer: [new TerserJSPlugin({}), new OptimizeCSSAssetsPlugin({})],
  },
  plugins: [new MiniCssExtractPlugin()],
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: './',
            },
          },
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
            },
          },
          'postcss-loader',
        ],
      },
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
            plugins: ['@babel/plugin-proposal-class-properties'],
          },
        },
      },
    ],
  },
};

const createConfigForFile = (defaultConfig, options) => {
  let outputFilename;
  let entry;
  let outputDir = 'dist';

  if (options.isPage) {
    outputFilename = 'index';
    outputDir += `/${options.pageName}`;
    entry = getEntryForPage(options.pageName);
  } else {
    outputFilename = options.name;
    entry = getEntry(options.name);
  }

  return {
    entry,
    output: {
      filename: `${outputFilename}.js`,
      path: path.resolve(__dirname, outputDir),
    },
    ...defaultConfig,
  };
};

const getEntry = (dir) => `./src/js/${dir}/index.js`;
const getEntryForPage = (dir) => `./src/js/pages/${dir}/index.js`;

let webpackConfig = [];

// pages entry point are their JS files. CSS is included here as well.
const pages = ['about', 'blog_post', 'blog', 'code', 'error', 'home', 'resume'];

// other files
const otherFiles = ['main'];

pages.forEach((page) => {
  if (fs.existsSync(getEntryForPage(page))) {
    webpackConfig.push(createConfigForFile(defaultConfig, { isPage: true, pageName: page }));
  }
});

otherFiles.forEach((file) => {
  webpackConfig.push(createConfigForFile(defaultConfig, { isPage: false, name: file }));
});

module.exports = webpackConfig;
