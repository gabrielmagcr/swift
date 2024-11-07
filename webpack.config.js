process.traceDeprecation = true;
const path = require('path');
const webpack = require('webpack');
const fs = require('fs');
const ExtractCssChunks = require("extract-css-chunks-webpack-plugin");
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const MinifyPlugin = require("babel-minify-webpack-plugin");
const ProgressBarPlugin = require('progress-bar-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');
const DashboardPlugin = require('webpack-dashboard/plugin');
const devMode = process.env.NODE_ENV !== 'production';
const CopyWebpackPlugin = require('copy-webpack-plugin');

const PROXY = 'https://swift.local';
const PUBLIC_PATH = '/wp-content/themes/swift/';

const config = {
    mode: !devMode ? 'production' : 'development',

    // Modificación: Definir múltiples entradas para cada página
    entry: {
        app: path.resolve(__dirname, './assets/js/app.js'), // Script principal
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
        filename: 'scripts/[name].js',  // Salida para scripts JS
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
};

// Configuración de plugins para producción
if (process.env.NODE_ENV === 'production') {
    config.plugins.push(
        // new CleanWebpackPlugin(),
        new webpack.DefinePlugin({
            'process.env.NODE_ENV': '"production"'
        }),
        new MinifyPlugin(),
        new OptimizeCssAssetsPlugin()  // Optimización y minificación de los CSS generados
    );
}

module.exports = config;
