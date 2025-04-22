# Basic_HelloAdmin

Este módulo de Magento 2 muestra un mensaje de "Hello World!" en el panel de administración de Magento. Es un ejemplo sencillo para aprender cómo crear un módulo básico que interactúe con el backend de Magento.

# Preview





## Características

- Añade una opción en el menú del panel de administración de Magento.
- Muestra un mensaje "Hello World!" en una página dedicada dentro del panel de administración.
- Utiliza buenas prácticas como controladores, permisos de acceso (ACL) y layouts para el backend.

## Estructura del módulo

```plaintext
app/code/Basic/HelloAdmin/
├── Controller/
│   └── Adminhtml/
│       └── Index/
|          └── Admin.php
├── etc/
│   ├── acl.xml
│   ├── module.xml
│   └── adminhtml/
│       └── menu.xml
│       └── routes.xml
├── registration.php
└── view/
    └── adminhtml/
        └── layout/
            └── helloadmin_index_admin.xml
        └── templates/
            └── helloadmin.phtml
