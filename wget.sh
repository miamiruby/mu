wget --user-agent="Firefox/2.0.0.11" -erobots=off -d --keep-session-cookies --save-cookies cookies.txt --post-data 'fuseaction=do_login&page=&username=jp&password=jnjp&Submit=Login' http://crm.jetnetwork.com/login/index.cfm

wget --load-cookies cookies.txt -erobots=off -d --random-wait --recursive --level=0 --convert-links --timestamping -p http://crm.jetnetwork.com/contacts/index.cfm





