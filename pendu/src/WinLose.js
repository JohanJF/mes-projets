import React from 'react'

import './WinLose.css'

const WinLose = ({ finishGame, onClick }) => (
    <div id='reset'>
        <h1 id = {finishGame}>
            {finishGame === 'win' && 'Vous avez gagné !'}
            {finishGame === 'lose' && 'Vous avez perdu !'}
        </h1>
        <div id="my_reset">
            <input type="button" onClick = { () => onClick() } value='reset' />
        </div>
    </div>
)

export default WinLose