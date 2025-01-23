process.traceDeprecation = true;
const path = require('path');
const webpack = require('webpack');
const fs = require('fs');
const ExtractCssChunks = require("extract-css-chunks-webpack-plugin");
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const TerserWebpackPlugin = require("terser-webpack-plugin");
const ProgressBarPlugin = require('progress-bar-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

const PROXY = 'https://swift.local';
const PUBLIC_PATH = '/wp-content/themes/swift/';

const devMode = process.env.NODE_ENV !== 'production';

const config = {
    mode: !devMode ? 'production' : 'development',

    // Solo mantiene una entrada principal para el JS y entradas adicionales para los SCSS
    entry: {
        app: path.resolve(__dirname, './assets/js/app.js'), // Solo el archivo JS principal
        sweepstakes: path.resolve(__dirname, './assets/scss/sweepstakes.scss'),
        contact: path.resolve(__dirname, './assets/scss/contact.scss'),
        heritage: path.resolve(__dirname, './assets/scss/heritage.scss'),
        veal: path.resolve(__dirname, './assets/scss/veal.scss'),
        lowes: path.resolve(__dirname, './assets/scss/lowes.scss'),
        masterclass: path.resolve(__dirname, './assets/scss/masterclass.scss'),
        offers: path.resolve(__dirname, './assets/scss/offers.scss'),
        privacy: path.resolve(__dirname, './assets/scss/privacy.scss'),
        products: path.resolve(__dirname, './assets/scss/products.scss'),
        locator: path.resolve(__dirname, './assets/scss/locator.scss'),
        sustain: path.resolve(__dirname, './assets/scss/sustain.scss'),
        tailgate_with_swift: path.resolve(__dirname, './assets/scss/tailgate_with_swift.scss'),
        tips: path.resolve(__dirname, './assets/scss/tips.scss'),
        search: path.resolve(__dirname, './assets/scss/search.scss'),
        recipes: path.resolve(__dirname, './assets/scss/recipes.scss'),
        product: path.resolve(__dirname, './assets/scss/single-products.scss'),
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
                target: PROXY,
                changeOrigin: true,
                publicPath: PUBLIC_PATH,
                secure: false
            }
        }
    },

    devtool: devMode ? 'inline-source-map' : undefined,

    output: {
        filename: 'scripts/[name].js',  // Genera un archivo JS por cada entrada
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
                           // Importar variables globales o mixins si es necesario
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
        new CopyWebpackPlugin([]),
        new VueLoaderPlugin(),
        new ExtractCssChunks({
            hot: true,
            filename: 'styles/[name].css', // Genera un archivo CSS por cada entrada
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

    // Optimización de los archivos JS y CSS
    optimization: {
        minimize: true,
        minimizer: [
            new TerserWebpackPlugin({  // Minificación solo del JS principal
                test: /app\.js$/,
                terserOptions: {
                    compress: {
                        drop_console: true, // Eliminar `console` en producción
                    },
                },
            }),
            new OptimizeCssAssetsPlugin()  // Minificación y optimización de los CSS generados
        ]
    },
};

// Configuración para producción
if (process.env.NODE_ENV === 'production') {
    config.plugins.push(
        new webpack.DefinePlugin({
            'process.env.NODE_ENV': '"production"'
        }),
        //new CleanWebpackPlugin(), // Si lo deseas, limpia la carpeta de salida
    );
}

module.exports = config;
