const presets = [
  [
    "@babel/preset-env",
    {
      targets: ["last 2 versions", "ie >= 10"],
      useBuiltIns: "usage",
      corejs: 3,
      debug: true
    },
  ],
]

const plugins = [
  "@babel/plugin-transform-shorthand-properties",
  "@babel/plugin-syntax-dynamic-import"
]

module.exports = { presets, plugins, babelrc: false }