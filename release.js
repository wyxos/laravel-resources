(async function () {
    const { execSync } = require('child_process')
    const prompt = require('prompt')
    const fs = require('fs')

    // read package.json
    // get version
    const currentVersion = execSync('git describe --tags --abbrev=0').toString()

    // prompt user for version
    prompt.start()
    const { version } = await prompt.get({
        properties: {
            version: {
                description: 'Enter the version to publish:',
                default: currentVersion,
                before: function(value) { return 'v' + value; }
            }
        }
    })

    execSync('git add .')
    execSync(`git commit -m "Release ${version}"`)
    execSync(`git tag -a ${version}`)
    execSync('git push --tags')
}())
