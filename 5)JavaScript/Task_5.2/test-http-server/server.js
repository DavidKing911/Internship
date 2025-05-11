import * as fs from 'fs';
export default {
	'/form/': function({post}) {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        let data = JSON.parse(jsonData);
        let user = JSON.parse(post);
        let newId = data[data.length - 1].id + 1;

        data.push({id: newId, name: user.name, comment: user.comment})

        fs.writeFileSync(jsonPath, JSON.stringify(data));
        let newJsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });

        return newJsonData;
	},

    '/users/comments/': function() {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });

        return jsonData;
    },

    '/users/user/': function({get, body}) {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        let data = JSON.parse(jsonData);
        let user = data.find(user => user.id == get.userId);

        user.name = JSON.parse(body).name;
        user.comment = JSON.parse(body).comment;
        
        fs.writeFileSync(jsonPath, JSON.stringify(data));
        let newJsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });

        return newJsonData;
    },

    '/users/': function({get}) {
        let jsonPath = './public/db/local-file.json';
        let jsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });
        let data = JSON.parse(jsonData);
        let newData = data.filter(elem => {return elem.id != get.userId});
        let id = 1;

        newData.forEach(user => {
            user.id = id++;
        })

        fs.writeFileSync(jsonPath, JSON.stringify(newData));
        let newJsonData = fs.readFileSync(jsonPath, { encoding: 'utf8', flag: 'r' });

        return newJsonData;
    }
}