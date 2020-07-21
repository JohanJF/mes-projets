import React from 'react';

import LetterKeyboard from './LetterKeyboard.js';
import MyModal from './MyModal.js'
import './App.css';
import FindWord from './FindWord.js';
import WinLose from './WinLose.js'

const LETTER = 'abcdefghijklmnopqrstuvwxyz'
var new_letter = []
const specialChar = ["'",' ', 'é', '(', ')', 'è', 'ç', 'à', '_', '-', '=', '&', '"', 'ù', ',', ';', ':', '!', '?', '.', '/', '§', '%', 'µ', '£', '¨', '^', '$'] 

class App extends React.Component{

  state = {
    letters : [],
    myWord : [],
    wordsFind : 0,
    tentative : 0,
    score : 0
  }


  // GÉNÉRER UN TABLEAU DE LETTRE
  myKeyboard() {
    var keyboard = []
    keyboard = LETTER.split('')
    return keyboard
  }
 
  // FERMER OUVRIR FENETRE MODALE
  closeOpenModal(open_close_modal,open_close_keyboard) {
    var modal = document.getElementById("myModal");
    var keyboard = document.getElementById("container2")
    modal.style.display = open_close_modal;
    keyboard.style.display = open_close_keyboard;
  }

  // DÉSACTIVER LETTRE DÉJA UTILISÉE
  presentLetter(letter,index) {
    const { letters } = this.state
    const letters_matched = letters.includes(letter)
    if(letters.includes(letter)) {
      document.getElementById(index).setAttribute('class','letterDisable')
      return letters_matched ? 1 : 0
    }
  }

  // AJOUTER LETTRE CLIQUÉ DANS LE TABLEAU
  handleMyLetter = letter => {
    const { letters }  = this.state
    if(letters.includes(letter)) {
      return
    }
    this.setState({ letters: [letter] })
    this.findLetter(letter,new_letter)
    this.wordFind(letter)
  }

  findLetter(letter,new_letter) {
    new_letter.push(letter)
    this.setState({letters: new_letter})
  }

  // AUGMENTER LE SCORE 
  wordFind(letter) {
    const {  myWord, wordsFind, tentative, score } = this.state
    
    if(myWord.includes(letter) ) {
      this.setState({wordsFind: wordsFind+1})
      this.setState({score: score+2})
    }
    else  {
      this.setState({tentative: tentative+1}) 
      this.setState({score: score-1})
    }

  }

  // RÉACTION LORS DE LA FIN DU JEU
  finishGame() {
    const {  myWord, wordsFind, tentative } = this.state
    var count_my_word = this.countMyWord()
    var keyboard = document.getElementById("container2")

    if(wordsFind === count_my_word && myWord.length !== 0) {
      keyboard.style.display = 'none';
      return 'win'
    }
    else if (tentative === 11) {
      keyboard.style.display = 'none';
      return 'lose'
    }
  }



  // AJOUTE MON MOT CHOISI DANS UN TABLEAU
  myChoosenWord = () => {
    var word = document.getElementById('myWord').value
    var word_valid = true

    if ( word === "" )
    {
      word_valid = false 
    }

    word.split('').map((myLetter) => {
      if( specialChar.includes(myLetter)) {
        word_valid = false
        return word_valid
      }
      return word_valid
    })
    
    if (word_valid){
      this.setState({myWord: word.toLowerCase().split('')}) 
      this.closeOpenModal('none','flex') 
    }
    
  }

  // PERMET DE RECOMMENCER LE JEU
  resetParameter = () => {

    var disable = Array.from(document.getElementsByClassName('letterDisable'))
    document.getElementById('myWord').value = ''

    this.setState({letters : [], myWord : [], wordsFind : 0, tentative : 0, score : 0})
    new_letter = []
    this.closeOpenModal('block','none')

    disable.map((letter) => {
      letter.setAttribute('class','letter')
      return null
    })

  }

  // PERMET DE COMPTER LE MOT CHOISIT EN ENLEVANT LES OCCURENCES
  countMyWord ()  {
    const { myWord } = this.state
    var number = 0
    var tmp = myWord

    myWord.map((letter) => {
       
      if (tmp.includes(letter)) {
        tmp = this.removeA(tmp,letter)
        number = number + 1 
      }
      
      return null
    })

    return number
  }


  removeA(array, element) {
    return array.filter(e => e !== element);
  };


  render() {
    const { letters, myWord, tentative, score} = this.state
    return (
      <div className="App">
        <MyModal
          wordChoosen = {this.myChoosenWord}
        />
        <header id="container1">
          <article id="infos">
            <section>
              <p>Tentatives : { tentative } / 11</p>
            </section>
            <section>
              <p>Score : { score }</p>
            </section>
          </article>
          <WinLose
            finishGame = { this.finishGame() }
            onClick = {this.resetParameter}
          />
          <p className="masque">
            {myWord.map((letter,index,find) => (
              <FindWord 
                letter = { letter }
                letter_dotted = "_"
                letters = {letters}
                key = { 'k-'+index }
              />
            ))}
          </p>
        </header>
        <main id="container2">
          {this.myKeyboard().map((letter,index) => (  
             <LetterKeyboard 
               letter = {letter}
               key = {'letter-'+index}
               id = { index }
               isDisabled = { this.presentLetter(letter,index) }
               onClick = {this.handleMyLetter}
             />
          ))} 
        </main> 
      </div>
    );
  }
}

export default App;
