process.traceDeprecation = true;
const path = require('path');
const webpack = require('webpack');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');
const devMode = process.env.NODE_ENV !== 'production';

const PROXY = 'https://swift.local';
const PUBLIC_PATH = '/wp-content/themes/swift/';

const config = {
    mode: devMode ? 'development' : 'production',

    // Entradas separadas para cada archivo de JS y SCSS
    entry: {
        app: [path.resolve(__dirname, './assets/js/app.js'), path.resolve(__dirname, './assets/scss/app.scss')],  // Archivo global
        heritage: [path.resolve(__dirname, './assets/js/heritage.js'), path.resolve(__dirname, './assets/scss/heritage.scss')],
        masterclass: [path.resolve(__dirname, './assets/js/masterclass.js'), path.resolve(__dirname, './assets/scss/masterclass.scss')],
        offers: [path.resolve(__dirname, './assets/js/offers.js'), path.resolve(__dirname, './assets/scss/offers.scss')],
        contact: [path.resolve(__dirname, './assets/js/contact.js'), path.resolve(__dirname, './assets/scss/contact.scss')],
        products: [path.resolve(__dirname, './assets/js/products.js'), path.resolve(__dirname, './assets/scss/products.scss')],
        sweepstakes: [path.resolve(__dirname, './assets/js/sweepstakes.js'), path.resolve(__dirname, './assets/scss/sweepstakes.scss')],
        privacy: [path.resolve(__dirname, './assets/js/privacy.js'), path.resolve(__dirname, './assets/scss/privacy.scss')],
        sustain: [path.resolve(__dirname, './assets/js/sustain.js'), path.resolve(__dirname, './assets/scss/sustain.scss')],
        locator: [path.resolve(__dirname, './assets/js/locator.js'), path.resolve(__dirname, './assets/scss/locator.scss')],
        tips: [path.resolve(__dirname, './assets/js/tips.js'), path.resolve(__dirname, './assets/scss/tips.scss')],
        search: [path.resolve(__dirname, './assets/js/search.js'), path.resolve(__dirname, './assets/scss/search.scss')],
        recipes: [path.resolve(__dirname, './assets/js/recipes.js'), path.resolve(__dirname, './assets/scss/recipes.scss')],
        product: [path.resolve(__dirname, './assets/js/product.js'), path.resolve(__dirname, './assets/scss/single-products.scss')],
    },    

    devServer: devMode ? {
        port: 9494,
        host: '0.0.0.0',
        https: true,
        allowedHosts: ['.swift.local', '.bowtie-vagrant.test'],
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
    } : undefined,

    devtool: devMode ? 'inline-source-map' : false,

    output: {
        filename: 'scripts/[name].js',  // Cada archivo JS va a dist/scripts/
        path: path.resolve(__dirname, './dist'),
        publicPath: PUBLIC_PATH
    },

    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    devMode ? 'style-loader' : MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [require('autoprefixer')()]
                            },
                            sourceMap: devMode
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: { sourceMap: devMode }
                    }
                ]
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg|png|jpe?g|gif)$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'images/',
                            publicPath: PUBLIC_PATH + 'dist/images/'
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
        new MiniCssExtractPlugin({
            filename: 'styles/[name].css'  // Genera un archivo CSS por cada entrada
        }),
        new WebpackBuildNotifierPlugin({
            sound: 'Funk',
            successSound: 'Pop'
        }),
        new WriteFilePlugin({
            force: true,  // Escribir los archivos en disco en modo desarrollo
            test: /^(?!.*(hot)).*/,  // Evita escribir los archivos temporales de HMR
        })
    ]
};

module.exports = config;
