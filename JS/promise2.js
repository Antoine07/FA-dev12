'use strict';

function $http(url) {

    let request = {
        ajax: function (method, url, args) {
            let promise = new Promise(function (resolve, reject) {
                let client = new XMLHttpRequest();
                let Url = '';
                if (args) {
                    let p = '?';
                    let count = 0;
                    for (let param in args) {
                        if (count > 0) p += '&';
                        p += encodeURIComponent(param) + '=' + encodeURIComponent(args[param]);
                        count++;
                    }

                     Url = url + p;
                }

                client.open(method, Url);
                client.send();

                client.onload = function () {
                    if (this.status >= 200 && this.status < 300) {
                        resolve(this.response);
                    } else {
                        reject(this.statusText);
                    }
                };
                client.onerror = function () {
                    reject(this.statusText);
                };
            });

            return promise;
        }
    };

    return {
        'get': function (args) {
            return request.ajax('GET', url, args);
        },
        'post': function (args) {
            return request.ajax('POST', url, args);
        },
        'put': function (args) {
            return request.ajax('PUT', url, args);
        },
        'delete': function (args) {
            return request.ajax('DELETE', url, args);
        }
    };
};

let url = 'https://api.github.com/repos/Antoine07/FA-dev12';
let params = {
    'access_token': 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'

};

let msg = {
    success: function (data) {
        console.log(data);
    },
    error: function (data) {
        console.log(data);
    }
};

$http(url)
    .get(params)
    .then(msg.success)
    .catch(msg.error);

