[<img src="https://cdn.rawgit.com/lutsen/lagan/master/lagan-logo.svg" width="100" alt="Lagan">](https://github.com/lutsen/lagan)

Lagan Password Hash Property Controller
========================================

Controller for the Lagan Password Hash property.
Generate password hashes using the PHP password_hash function.
Uses the [Siriusphp validation library](https://github.com/siriusphp/validation) to validate password strings before hashing. You can use [the built in validation rules](http://www.sirius.ro/php/sirius/validation/validation_rules.html) by adding them to the 'validate' value in the property array. Add multiple validation rules by seperating them with a pipe character.  
Example: `'validate' => 'minlength(3) | alphanumeric'`

To be used with [Lagan](https://github.com/lutsen/lagan). Lagan lets you create flexible content objects with a simple class, and manage them with a web interface.

Lagan is a project of [Lútsen Stellingwerff](http://lutsen.net/).