# Liste des routes

| URL                               | HTTP Method | Controller        | Method   | Title          | Content                              | Comment                        |
|-----------------------------------|-------------|-------------------|----------|----------------|--------------------------------------|--------------------------------|
| /                                 | GET         | MainController    | home     | Dans les shoe  | 5 categories                         | -                              |
| /legal-mentions/                  | GET         | MainController    | legal    | Legal Mentions | List legal mentions                  | -                              |
| /catalog/category/[i:category_id] | GET         | CatalogController | category | Category name  | Products from this category          | category_id must be an integer |
| /catalog/type/[i:type_id]         | GET         | CatalogController | type     | Type name      | Products of this type                | type_id must be an integer     |
| /catalog/brand/[i:brand_id]       | GET         | CatalogController | brand    | Brand name     | Products of the brand                | brand_id must be an integer    |
| /catalog/product/[i:product_id]   | GET         | CatalogController | product  | Product name   | Description + picture of the product | product_id must be an integer  |