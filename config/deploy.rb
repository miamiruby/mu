set :application, "tutorial"
set :repository, "git@github.com:miamiphp/mu.git"
set :deploy_to, "/var/www/vhosts/speeduneed.com/subdomains/cap/httpdocs/"
set :scm, :git
set :domain, 'webserver'
set :deploy_via, :remote_cache
ssh_optons[:paranoid] - false
set :user, "pkuger"
set :runner, "root"
server "cap.speeduneed.com", :app, :web, :db, :primary => true

