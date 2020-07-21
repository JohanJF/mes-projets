import React from 'react'

import './MyModal.css'

const MyModal = ( { wordChoosen}) => (
    <div id="myModal">
        <div className="modal-content">
            <div id="content">
                <header>
                    <h1 id="title">Jeu du pendu</h1>
                </header>
                <article id="containerModal">
                    <section>
                        <input type="text" id="myWord" required />
                    </section>
                    <section>
                        <input id="Go" type="button" onClick = { () => wordChoosen() } value="Go"/> 
                    </section>           
                </article>
            </div>
        </div>    
    </div>
)

export default MyModal