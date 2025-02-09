FROM node:20-alpine

WORKDIR /app

RUN npm install -g json-server

COPY db.json .

CMD ["json-server", "--host", "0.0.0.0", "--watch", "db.json"]