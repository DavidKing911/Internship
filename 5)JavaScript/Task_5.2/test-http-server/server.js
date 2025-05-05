import * as fs from 'fs';
export default {
	'/form/': function({post}) {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        let data = JSON.parse(jsonData);
        data.push([post.name, post.comment])
        fs.writeFileSync(jsonPath, JSON.stringify(data));
        let newJsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        return newJsonData;
	},

    '/users/': function() {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        return jsonData;
    },

    '/changeUser/': function({post}) {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        let data = JSON.parse(jsonData);
        for (let element of data) {
            if (element[0] == post.name && element[1] == post.comment) {
                element[0] = post.newName;
                element[1] = post.newComment;
                fs.writeFileSync(jsonPath, JSON.stringify(data));
                let newJsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
                return newJsonData;
            }
        }
    },

    '/deleteUser/': function({post}) {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        let data = JSON.parse(jsonData);
        for (let i = 0; i < data.length; i++) {
            if (data[i][0] == post.name && data[i][1] == post.comment) {
                data.splice(i, 1);
                fs.writeFileSync(jsonPath, JSON.stringify(data));
                let newJsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
                return newJsonData;
            }
        }
    }
}