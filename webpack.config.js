process.traceDeprecation = true
const path = require('path')
const webpack = require('webpack')
const fs = require('fs')
const ExtractCssChunks = require("extract-css-chunks-webpack-plugin")
const WebpackBuildNotifierPlugin = require('webpack-build-notifier')
const VueLoaderPlugin = require('vue-loader/lib/plugin')
const MinifyPlugin = require("babel-minify-webpack-plugin")
const ProgressBarPlugin = require('progress-bar-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const WriteFilePlugin = require('write-file-webpack-plugin')
const DashboardPlugin = require('webpack-dashboard/plugin')
const devMode = process.env.NODE_ENV !== 'production'
const CopyWebpackPlugin = require('copy-webpack-plugin')

const PROXY = 'https://swift.local'
const PUBLIC_PATH = '/wp-content/themes/swift/'

const config = {
    mode: !devMode ? 'production' : 'development',
    entry: {
        app: path.resolve(__dirname, './assets/js/app.js'),
    },
    devServer: !devMode ? undefined : {
        port: 9494,
        host: '0.0.0.0',
        hot: true,
        https: true,
        allowedHosts: [
            '.swift.local',
            '.bowtie-vagrant.test',
        ],
        headers: { 'Access-Control-Allow-Origin': '*' },
        contentBase: path.join(__dirname, '.'),
        watchContentBase: true,
        watchOptions: {
            ignored: ['node_modules', 'dist', 'vendor', 'assets']
        },
        proxy: {
            '/': {
                index: '',
                context: () => true,
                target: PROXY,
                changeOrigin: true,
                publicPath: PUBLIC_PATH,
                secure: false
            }
        }
    },
    devtool: devMode ? 'inline-source-map' : undefined,
    output: {
        filename: 'scripts/[name].js',
        path: path.resolve(__dirname, './dist'),
        publicPath: PUBLIC_PATH
    },
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            '@': path.resolve(__dirname, '.')
        }
    },
    externals: {
        
    },
    module: {
       rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
            },
            {
                test: /\.css$/,
                use: [
                    'css-hot-loader',
                    ExtractCssChunks.loader,
                    "css-loader"
                ]
            },
           {
               test: /\.(sa|sc|c)ss$/,
               use: [
                    {
                        loader: ExtractCssChunks.loader,
                        options: {
                            hot: true
                        }
                    },
                   'css-loader',
                   {
                       loader: 'postcss-loader',
                       options: {
                           config: {
                               path: path.resolve(__dirname, './postcss.config.js')
                           }
                       }
                   },
                   {
                       loader: 'sass-loader',
                       options: {
                        //    data: '@import "assets/scss/variables";'
                       }
                   },
               ],
           },
           {
            test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
            use: [
              {
                loader: 'file-loader',
                options: {
                  name: '[name].[ext]',
                  outputPath: 'fonts/',
                  publicPath: PUBLIC_PATH + 'dist/fonts/'
                }
              }
            ]
            },
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
            }
        ]
    },
    plugins: [
        new CopyWebpackPlugin([
            
        ]),
        new VueLoaderPlugin(),
        new ExtractCssChunks({
            hot: true,
            filename: 'styles/[name].css',
        }),
        new WebpackBuildNotifierPlugin({
            sound: 'Funk',
            successSound: 'Pop'
        }),
        new WriteFilePlugin({
            force: true,
	        test: /^(?!.*(hot)).*/,
        }),
    ],
}

if ( process.env.NODE_ENV === 'production' ) {
    config.plugins.push(
        // new CleanWebpackPlugin(),
        new webpack.DefinePlugin({
            'process.env.NODE_ENV': '"production"'
        }),
        new MinifyPlugin(),
        new OptimizeCssAssetsPlugin()
        // new ProgressBarPlugin()
    )
}

module.exports = config