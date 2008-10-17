set :application, "tutorial"
set :domain, 'webserver'

set :scm, :git
set :repository, "git@github.com:miamiphp/mu.git"

set :deploy_via, :remote_cache

server "cap.speeduneed.com", :app, :web, :db, :primary => true
set :deploy_to, "/var/www/vhosts/speeduneed.com/subdomains/cap/httpdocs/"
ssh_options[:port] = 2221
set :user, "pkuger"
;set :runner, "root"
set :use_sudo, false
