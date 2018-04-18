FROM node:latest

WORKDIR /usr/src/websocket

COPY package*.json ./
RUN npm install

COPY ./*.js .

EXPOSE 1337 

CMD [ "npm", "start" ]
