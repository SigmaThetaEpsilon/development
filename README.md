# Repository Contents #
This repository contains the core web application code for the Sigma Theta Epsilon national website. It is a PHP application using a MySQL database, and the application is compiled using Node.js as an NPM package.

It is getting to be a pseudo-custom Content Management System (CMS). There are other solutions that are probably better, but I just wanted to build one for myself.

Here is how the structure of the repository is laid out:
* `/dist/` - Contains compiled version of the application
* `/src/` - Contains source code of the application
* `.gitignore` - Used for ignoring commits of certain files.
* `gulpfile.js` - Configures build tasks in Node.js
* `package.json` and `package-lock.json` - Describe the NPM package information.
* `README.md` - Explain the repository contents

## Contents of src ##
TODO

## Contents of dist ##
TODO

# How to Run #
## Build Using NPM ##
TODO - describe NPM scripts and how gulp plays into it.

## Deploy to Local Server ##
We are only going to talk about local deployment. Here are the reasons:
* Database configuraiton needs setup.
* File setup (changes to colors, images, etc.)
* Server types differ greatly (dev, test, production).
* There are way too many better tools/solutions than I can offer here.

As such, I'm not going to tell you how to manage server setup for ongoing work since there really isn't a one-size-fits-all.

This application can either be deployed to IIS (Windows) or Apache (Linux/Unix). Yes, you can technically get Apache running on Windows using Apache Tomcat, but it really is not recommended since IIS is built into Windows. But I digress.

We are going to talk about deploy steps on either scheme.

### IIS (Windows) ###
Configuration file: `web.config`

TODO

### Apache (Linux/Unix) ###
Configuration file: `.htaccess`

TODO