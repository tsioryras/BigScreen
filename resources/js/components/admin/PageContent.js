import React, {useState} from 'react';
import axios from "axios";

let url;
const PageContent = (props) => {
    const [content, setContent] = useState('');
    switch (props.page) {
        case 'question':
            url = 'http://localhost:3000/administration/users';
            break;
        case 'answer':
            url = 'http://localhost:3000/administration/users';
            break;
        default:
            url = 'http://localhost:3000/administration/users';
            break;

    }

    const dataGet = axios.get(url).then(function (response) {
        setContent(response.data[0].name);
    }).catch(function (error) {
        console.log(error);
    });

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-body">
                            <div>{content}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default PageContent;