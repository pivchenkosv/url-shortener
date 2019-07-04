# -*- mode: ruby -*-
# vi: set ft=ruby :

$provision_script = <<PROVISION
    apt-get -y update
    apt-get install ifupdown -y
PROVISION

Vagrant.configure("2") do |config|
    config.vm.provision "shell", inline: $provision_script
    config.vm.provider "virtualbox" do |vb|
        vb.gui = false
        vb.memory = "1024"
    end

    config.vm.box = "generic/ubuntu1710"
    config.vm.network "forwarded_port", guest: 80, host: 8080, auto_correct: false
    config.vm.network "private_network", ip: "192.168.37.200"
end

require 'json'
require 'yaml'

VAGRANTFILE_API_VERSION ||= "2"
confDir = $confDir ||= File.expand_path("vendor/laravel/homestead", File.dirname(__FILE__))

homesteadYamlPath = File.expand_path("Homestead.yaml", File.dirname(__FILE__))
homesteadJsonPath = File.expand_path("Homestead.json", File.dirname(__FILE__))
afterScriptPath = "after.sh"
customizationScriptPath = "user-customizations.sh"
aliasesPath = "aliases"

require File.expand_path(confDir + '/scripts/homestead.rb')

Vagrant.require_version '>= 1.9.0'

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    if File.exist? aliasesPath then
        config.vm.provision "file", source: aliasesPath, destination: "/tmp/bash_aliases"
        config.vm.provision "shell" do |s|
            s.inline = "awk '{ sub(\"\r$\", \"\"); print }' /tmp/bash_aliases > /home/vagrant/.bash_aliases"
        end
    end

    if File.exist? homesteadYamlPath then
        settings = YAML::load(File.read(homesteadYamlPath))
    elsif File.exist? homesteadJsonPath then
        settings = JSON::parse(File.read(homesteadJsonPath))
    else
        abort "Homestead settings file not found in " + File.dirname(__FILE__)
    end

    Homestead.configure(config, settings)

    if File.exist? afterScriptPath then
        config.vm.provision "shell", path: afterScriptPath, privileged: false, keep_color: true
    end

    if File.exist? customizationScriptPath then
        config.vm.provision "shell", path: customizationScriptPath, privileged: false, keep_color: true
    end

    if Vagrant.has_plugin?('vagrant-hostsupdater')
        config.hostsupdater.aliases = settings['sites'].map { |site| site['map'] }
    elsif Vagrant.has_plugin?('vagrant-hostmanager')
        config.hostmanager.enabled = true
        config.hostmanager.manage_host = true
        config.hostmanager.aliases = settings['sites'].map { |site| site['map'] }
    end
end
