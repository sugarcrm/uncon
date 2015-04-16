var config = require('./config');
var utils = {};

utils.cylon = {
    getConnection: function(type) {
        var connection = {};
        connection[type] = (type === config.ARDUINO) ?
        { adaptor: 'firmata', port: config.arduinoPort } :
        { adaptor: 'raspi' };
        return connection;
    }
};

/**
 * Log into Sugar with given user
 *
 * @param {object} api An instance of Sugar API
 * @param {string} user Name of the user to log in as - defined in config
 * @param {function} callback Function to call after successfully logging in
 */
utils.login = function(api, user, callback) {
    api.login(config.users[user], null, {
        success : function(data){
            console.log('Logged into Sugar - OAuth-Token : ' + api.getOAuthToken());
            callback(data);
        },
        error: function() {
            console.log('Error Logging In:', arguments);
        }
    });
};

module.exports = utils;