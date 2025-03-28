const swaggerJsDoc = require('swagger-jsdoc');
const swaggerUi = require('swagger-ui-express');

const swaggerOptions = {
    swaggerDefinition: {
      openapi: '3.0.0',
      info: {
        title: 'Zoolandia API',
        version: '1.0.0',
        description: 'API para gestionar animales, donaciones, compras y más en Zoolandia',
      },
      servers: [
        {
          url: 'http://localhost:3000',
          description: 'Servidor local',
        },
      ],
      components: {
        securitySchemes: {
          bearerAuth: {
            type: 'http',
            scheme: 'bearer',
            bearerFormat: 'JWT',
          },
        },
      },
      security: [
        {
          bearerAuth: [],
        },
      ],
      tags: [
        {
          name: 'Autenticación',
          description: 'Endpoints para manejar autenticación',
        },
        {
          name: 'Animales',
          description: 'Endpoints para gestionar animales',
        },
        {
          name: 'Administradores',
          description: 'Endpoints para gestionar administradores',
        },
        {
            name: 'Compras',
            description: 'Endpoints para gestionar compras',
          },
          {
            name: 'Reportes',
            description: 'Endpoints para gestionar reportes',
          },
          {
            name: 'Donaciones',
            description: 'Endpoints para gestionar Donaciones',
          },
      ], // Aquí defines el orden
    },
    apis: ['./routes/*token.js', './routes/*animales.js', './routes/*admin.js','./routes/*compras.js','./routes/*reportes.js','./routes/*donaciones.js']
  };


const swaggerDocs = swaggerJsDoc(swaggerOptions);

module.exports = (app) => {
  app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerDocs));
};
