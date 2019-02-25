

# sh '/shared-paul-files/Webs/git-repos/discipl.org-wordpress-theme-2019/distribute.sh' &>/dev/null


echo '----------------------------------------------------------------';
echo 'Distribute discipl.org theme';

# clear the log file
> '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/development/wp-content/debug.log'
> '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/gc_live_import/wp-content/debug.log'

# copy to temp dir
rsync -r -a --delete '/shared-paul-files/Webs/git-repos/discipl.org-wordpress-theme-2019/' '/shared-paul-files/Webs/temp/'

# clean up temp dir
rm -rf '/shared-paul-files/Webs/temp/.git/'
rm '/shared-paul-files/Webs/temp/.gitignore'
rm '/shared-paul-files/Webs/temp/config.codekit3'
rm '/shared-paul-files/Webs/temp/distribute.sh'
rm '/shared-paul-files/Webs/temp/README.md'
rm '/shared-paul-files/Webs/temp/LICENSE'

cd '/shared-paul-files/Webs/temp/'
find . -name ‘*.DS_Store’ -type f -delete


# --------------------------------------------------------------------------------------------------------------------------------
# Vertalingen --------------------------------------------------------------------------------------------------------------------
# --------------------------------------------------------------------------------------------------------------------------------

# copy languages to another temp dir
rsync -r -a --delete '/shared-paul-files/Webs/temp/languages/' '/shared-paul-files/Webs/temp-languages/'


# remove the .pot
rm '/shared-paul-files/Webs/temp-languages/discipl-2019.pot'

# copy files to /wp-content/languages/themes
rsync -ah '/shared-paul-files/Webs/temp-languages/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/development/wp-content/languages/themes/'

# languages erics server
rsync -ah '/shared-paul-files/Webs/temp-languages/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/live-dutchlogic/wp-content/languages/themes/'

# languages Sentia accept
rsync -ah '/shared-paul-files/Webs/temp-languages/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/sentia/accept/www/wp-content/languages/themes/'

# languages Sentia live
rsync -ah '/shared-paul-files/Webs/temp-languages/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/sentia/live/www/wp-content/languages/themes/'

# --------------------------------------------------------------------------------------------------------------------------------


# copy from temp dir to dev-env
rsync -r -a --delete '/shared-paul-files/Webs/temp/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/development/wp-content/themes/discipl-2019/' 

find . -name "*.map" -type f -delete;


# Naar GC import

rsync -r -a --delete '/shared-paul-files/Webs/temp/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/gc_live_import/wp-content/themes/discipl-2019/'

# remove temp dir
rm -rf '/shared-paul-files/Webs/temp/'
rm -rf '/shared-paul-files/Webs/temp-languages/'

# Naar Eriks server
rsync -r -a  --delete '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/gc_live_import/wp-content/themes/discipl-2019/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/live-dutchlogic/wp-content/themes/discipl-2019/'

# en een kopietje naar Sentia accept
rsync -r -a --delete '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/gc_live_import/wp-content/themes/discipl-2019/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/sentia/accept/www/wp-content/themes/discipl-2019/'

# en een kopietje naar Sentia live
rsync -r -a --delete '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/gc_live_import/wp-content/themes/discipl-2019/' '/shared-paul-files/Webs/ICTU/Gebruiker Centraal/sentia/live/www/wp-content/themes/discipl-2019/'


echo 'Ready';
echo '----------------------------------------------------------------';
