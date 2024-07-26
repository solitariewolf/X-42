const { Client, GatewayIntentBits } = require('discord.js');
const fs = require('fs');

function loadConfig() {
    const data = fs.readFileSync('../config/config.json');
    return JSON.parse(data);
}

const config = loadConfig();
const client = new Client({ intents: [GatewayIntentBits.Guilds, GatewayIntentBits.GuildMessages, GatewayIntentBits.MessageContent] });

client.once('ready', () => {
    console.log(`Bot logado como ${client.user.tag}`);
});

client.on('messageCreate', message => {
    if (message.content === '!ping') {
        message.channel.send('Pong!');
    }
});

function startBot() {
    client.login(config.token);
}

function stopBot() {
    client.destroy();
}

module.exports = { startBot, stopBot };

// Inicialize o bot
startBot();
