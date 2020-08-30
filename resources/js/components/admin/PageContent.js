import React from 'react';
import ListQuestion from "./ListQuestion";
import ListAnswer from "./ListAnswer";
import Charts from "./Charts";

let content;
const PageContent = (props) => {
    if (props.page === 'question') {
        content = <ListQuestion list={props.questions}/>
    }

    if (props.page === 'answer') {
        content = <ListAnswer list={props.answers}/>
    }

    if (props.page === 'home') {
        content = <Charts charts={props.graphics}/>
    }

    let homePage = props.page === 'home' ? 'home' : '';
    return (
        <div className="rigth-side row">
            <div className={'container ' + homePage}>
                {content}
            </div>
        </div>
    );
};
export default PageContent;