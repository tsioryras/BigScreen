import React from 'react';
import ListQuestion from "./ListQuestion";
import ListAnswer from "./ListAnswer";

let content;
const PageContent = (props) => {
    if (props.page === 'question') {
        content = <ListQuestion/>
    }

    if (props.page === 'answer') {
        content = <ListAnswer/>
    }
    return (
        <div className="rigth-side row">
            <div className="container">
                <div>{content}</div>
            </div>
        </div>
    );
};
export default PageContent;