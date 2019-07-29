---
permalink: "/code/build.py"
---

import urllib2
import json

def requestGitHubRepos(page):
    response = urllib2.urlopen('https://api.github.com/users/xtrp/repos?type=public&sort=updated&per_page=100&page=' + str(page))
    #response = urllib2.urlopen('http://localhost:8000/test.txt')
    HTML = response.read()
    response.close()
    return HTML

GitHubRepos = []

currentRepoPage = 1
loopStatus = True
while(loopStatus):
    jsonCurrentPage = json.loads(requestGitHubRepos(currentRepoPage))
    if(len(jsonCurrentPage) > 0):
        GitHubRepos += jsonCurrentPage
        currentRepoPage += 1
    else:
        loopStatus = False

#GitHubRepos = json.loads(requestGitHubRepos(0))

compiledHTML = ""

for repo in GitHubRepos:
    if(not repo['archived']):
        updated_at = repo["updated_at"].split("T")[0].split("-")
        updated_at = str(str(int(updated_at[2])) + " " + ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][int(updated_at[1])] + ", " + updated_at[0])
        compiledHTML += '''
        <div class="block post project">
            <div class="top" style="border: none;margin: 0;padding: 0;">
                <h1><a href="{url}" style="color: inherit" target="_blank">{fullname}</a></h1>
                <p>
                    <span style="color: #444;margin-top: 1rem; max-width: 75%;">{description}</span>

                    <a style="margin-top: 1rem; margin-left: 1rem;" href="{html_url}">GitHub</a>
                    {homepagelink}
                </p>
            </div>
            <p style="margin-top: 2.5rem;" class="last_updated">Code Last Updated on {updated_at}</p>
        </div>'''.format(
            url = repo["html_url"] if (repo["homepage"] or "") == "" else repo["homepage"],
            fullname = repo["full_name"],
            description = repo["description"],
            html_url = repo["html_url"],
            homepagelink = (('<a style="margin-top: 1rem;margin-left: 1rem;" href="' + (repo["homepage"] or "") + '">Website</a>') if repo["homepage"] != "" else ''),
            updated_at = updated_at
        )

writeHTMLFile = open("projects_list.html", "w")
writeHTMLFile.write(compiledHTML)
writeHTMLFile.close()