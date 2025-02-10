FROM node:20-alpine
WORKDIR /app

# install simple http server for serving static content
RUN npm install -g http-server

COPY ./app/package*.json ./
RUN npm install
EXPOSE 5173

CMD ["http-server", "dist"]