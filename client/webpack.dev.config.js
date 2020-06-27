const path = require('path');

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    entry: './src/index.js',
    mode: 'development',
    output: {
        path: path.resolve(__dirname, 'dist', 'dev'),
        filename: 'webpack.js'
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [ 
                    MiniCssExtractPlugin.loader,
                    'css-loader', 
                    'sass-loader' 
                ]
            }
        ]
    },
    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({ filename: 'app.css' })
    ]

};