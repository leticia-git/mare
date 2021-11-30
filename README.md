# Base Landing Page

## install

1. npm i -g npm-check-updates

2. ncu -u

3. npm install

4. npm install npm-install-all -g 

5. npm-install-all gulpfile.js

6. enjoy


## deploy

```
 on:
    push:
    branches: [ NAME_BRANCH ]
    #pull_request:
        #branches: [ NAME_BRANCH ]
    #types:
        #- closed
        #- merged
    #status: {}    
        name: 🚀 FTP Deploy
        jobs:
            FTP-Deploy-Action:
        name: 🎉 FTP-Deploy-Action
        runs-on: ubuntu-16.04
        steps:
            - name: 🚚 Get latest code
        uses: actions/checkout@v2.1.0
        with:
            fetch-depth: 2
        - name: 📂 FTP-Deploy-Action
        uses: SamKirkland/FTP-Deploy-Action@3.0.0
        with:
            ftp-server: ftp://host/ or ftp.NAME.com
            ftp-username: user
            ftp-password: ${{ secrets.FTP_PASSWORD }}
```
