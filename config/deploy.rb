set :application, "tutorial"

set :repository, "git@github.com:miamiphp/mu.git"

set :deploy_to, "/var/www/vhosts/speeduneed.com/subdomains/cap/httpdocs/"

set :scm, :git

ssh_options[:port] = 7822

set :domain, 'webserver'
set :deploy_via, :remote_cache
set :user, "pkuger"
set :runner, "root"
server "cap.speeduneed.com", :app, :web, :db, :primary => true

