#CRUD-LTE

##Modified Symfony3 CRUD-LTE generator

Many thanks to Jordi Llonch for his CrudGeneratorBundle (https://github.com/jordillonch/CrudGeneratorBundle) that I've could modify. This bundle has a nice backend view for your entities. You can filtering, paginating, ordering, soft-deleting your data.

###how to **install**:
https://packagist.org/packages/vaszev/crud-bundle-lte

via **composer**:
```
$ composer install "vaszev/crud-lte-bundle":"dev-master"
```

in your **AppKernel.php**:
```php
new Lexik\Bundle\FormFilterBundle\LexikFormFilterBundle(),
new Vaszev\CrudLteBundle\VaszevCrudLteBundle(),
new Avanzu\AdminThemeBundle\AvanzuAdminThemeBundle(),
```

###soft-delete
Implementing the *soft-delete* interface, you have to extend your entity. The *Base* superclass will add the following fields to your entity: *id*, *deleted*, *created*, *edited*.
```php
class Document extends Base {}
```

Now, you have to enable the filter in your config.yml file:
```yaml
orm:
  filters:
    not_deleted:
      class:   Vaszev\CrudLteBundle\Filter\NotDeletedFilter
      enabled: true
```

###backend header-footer
Let's create the following files:

**app\Resources\views\vaszevCrudMenu.html.twig** (contains your custom styles and the backend menu too)
```twig
{% block stylesheets_sub %}{% endblock %}
{% block menu %}{% endblock %}
```

**app\Resources\views\vaszevCrudFooter.html.twig** (your personal/company informations goes here)
```twig
<footer></footer>
```

###final steps
Don't forget to update your schema.
```
$ php bin/console assets:install --symlink
$ php bin/console doctrine:schema:update --force
$ php bin/console avanzu:admin:fetch-vendor
```

You're ready to go
```
$ php bin/console vaszev:generate:crud-lte
```
