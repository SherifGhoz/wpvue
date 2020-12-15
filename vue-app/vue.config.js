module.exports = {
  productionSourceMap: false,
  publicPath:
    process.env.NODE_ENV === "production"
      ? "/wp-content/plugins/vue-app/dist/"
      : "http://localhost:8080/",
  outputDir: "../dist",
  configureWebpack: {
    devServer: {
      contentBase: "/wp-content/plugins/vue-app/dist/",
      allowedHosts: ["localhost"],
      headers: {
        "Access-Control-Allow-Origin": "*",
      },
    },
    externals: {
      jquery: "jQuery",
    },
    output: {
      filename: "js/[name].js",
      chunkFilename: "js/[name].js",
    },
  },
  css: {
    extract: {
      filename: "css/[name].css",
      chunkFilename: "css/[name].css",
    },
  },
};
