# Client #

A helper project for client resources and assets for the Sigma Theta Epsilon website. The following tools are used:
* Package management - [yarn](https://yarnpkg.com/)
* CSS pre-processing - [SASS](https://sass-lang.com/)
* JavaScript pre-processing - [TypeScript](https://www.typescriptlang.org/)
* Resource bundling - [webpack](https://webpack.js.org/)

## Style ##

Some references for the style resources:
* [Material Design](https://material.io/)
* [Material Components Web GitHub](https://github.com/material-components/material-components-web)

## Build ##

Scripts in `package.json`:
* `build-dev` - Run Webpack with `webpack.dev.config.js`
* `build-prod` - Run Webpack with `webpack.prod.config.js`

Steps to take:
* `yarn install` - Downloads Node.js modules
* If building development, `yarn run build-dev`
* Else (production), `yarn run build-prod`