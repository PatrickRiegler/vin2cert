FROM node:latest

WORKDIR /usr/src/websocket

EXPOSE 1337 

COPY package*.json ./
RUN npm install

COPY ./*.js .

CMD [ "npm", "start" ]
