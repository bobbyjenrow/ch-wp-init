# Wordpress Maintenance Starter

For projects built by others that we need to maintain. 

To get started run (  in your theme root directory ):
`npx degit https://rjenrow@bitbucket.org/cobblehilldigital/wp-maintain.git`

`chmod +x ./config.sh`

`./config.sh`

This will do the following:
1. Add cobblehill commonly used php scripts, functions, ect.
2. Create an assets/src folder ( if they do not exist already)
3. Generate .babelrc, .postcssrc, .browserslistrc, .gitignore files
4. Install package.json dependencies via yarn && run scripts

