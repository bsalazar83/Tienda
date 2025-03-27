#################################################################################################################

Tipo Clientes            Clientes                Facturas                Productos               Impuestos
--------------          -----------             ------------            ------------            ------------
id_tipo_cliente PK      id_cliente PK           id_factura PK           id_producto PK          id_impuesto PK
nombre_tipo             nombre                  numero_factura          nombre_producto         nombre_impuesto
fecha_creado            documento               id_cliente FK           cantidad                porcentaje
                        celular                 id_producto FK          codigo_producto         fecha_creado
                        id_tipo_cliente         cantidad_producto       precio_producto
                        fecha_creado            subtotal_producto       id_impuesto FK
                                                id_impuesto FK          estado_producto
                                                total_producto          fecha_creado
                                                fecha_creado            fecha_actualizado


Relaciones:
- Un producto tiene un solo impuesto, pero el mismo impuesto puede aplicarse a varios productos. 
    (Relación de muchos a uno: Productos → Impuestos)
- Una factura puede contener varios productos, y un producto puede estar en varias facturas. 
    (Relación de muchos a muchos: Facturas ↔ Productos)
- Un cliente puede tener varias facturas, pero una factura pertenece solo a un cliente. 
    (Relación de uno a muchos: Clientes → Facturas)
- Un cliente tiene un solo tipo de cliente, pero un tipo de cliente puede estar asignado a varios clientes. 
    (Relación de muchos a uno: Clientes → Tipo Clientes)

#################################################################################################################

