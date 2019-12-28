const TelegramBot = require('node-telegram-bot-api');
const debug = require('./helpers');
const TOKEN = "913175441:AAGxqCDWiySIyM3MXKPiTz1oCAWe1hpmjEk";

const STRING_RESPONSE_START = "Welcome to the Imperatorska bot!\n\n" +
    "What language did you prefer?";
const STRING_ERROR = "I'm sorry, there was a problem with the APIs. Please, let us [@imperatorska] know about it.";

console.log(' Bot has been started! :) ');

// Create a bot that uses 'polling' to fetch new updates
const bot = new TelegramBot(TOKEN, {
    polling: {
        interval: 300,
        autoStart: true,
        params: {
            timeout: 10
        }
    }
});

bot.onText(/\/start/, (msg) => {
    const chatId = msg.chat.id;

    bot.sendMessage(chatId, STRING_RESPONSE_START, {
            reply_markup: {
                keyboard: [
                    ['English','Русский'],
                ]
            }
        })
            .then(() => {
                console.log(' Keyboard has been send ')
            })
            .catch((error) => {
                console.error(error)
            })

    /*bot.sendMessage(chatId, "I am bot, not a human... I only can receive delivery requests")

        .then(() => {
            console.log(' Message \'I am bot\' has been send ')
        })
        .catch((error) => {
            console.error(error)
        });*/
});

bot.onText(/\/help (.+)/, (msg) => {
    const { id } = msg.chat;

    bot.sendMessage(id, match)
});

bot.on('message', msg => {
    const chatId = msg.chat.id;
    const { id } = msg.chat;
    const { lang } = msg.from.language_code;

    /* let sum = 5 + 9;
    const TOTAL_MARKDOWN = `*Total: ${sum}*`;
    bot.sendMessage(msg.chat.id, TOTAL_MARKDOWN, {
        parse_mode: 'Markdown'
    });*/


    if (msg.text.toLowerCase() === 'hello' || msg.text.toLowerCase() === 'hi' || msg.text.toLowerCase() === 'sup') {
        bot.sendMessage(id, `Hello, ${msg.from.first_name}!` )
            .then(() => {
                console.log(' Message \'hello\' has been send ')
            })
            .catch((error) => {
                console.error(error)
            })
    }

    if (msg.text === 'English' || msg.text === '🇬🇧'){
        bot.sendMessage(chatId, "Good choice!")

            .then(() => {
                console.log(' English ')
            })
            .catch((error) => {
                console.error(error)
            });


    } else if (msg.text === 'Русский' || msg.text === '🇷🇺'){
        bot.sendMessage(chatId, "Вы выбрали русский!")

            .then(() => {
                console.log(' Russian ')
            })
            .catch((error) => {
                console.error(error)
            });
    } else if (msg.text !== '/start'){
        bot.sendMessage(chatId, "I am bot, not a human... I only can receive delivery requests")

            .then(() => {
                console.log(' Message \'I am bot\' has been send ')
            })
            .catch((error) => {
                console.error(error)
            });
    }
    else{   }
});

