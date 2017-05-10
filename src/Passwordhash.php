<?php

namespace Lagan\Property;

use Sirius\Validation\Validator;

/**
 * Controller for the Lagan password hahs property.
 * Generate password hashes using the PHP password_hash function.
 * Uses the Siriusphp validation library to validate password strings before hashing.
 *
 * A property type controller can contain a set, read, delete and options method. All methods are optional.
 * To be used with Lagan: https://github.com/lutsen/lagan
 */

class Passwordhash {

	/**
	 * The set method is executed each time a property with this type is set.
	 *
	 * @param bean		$bean		The Redbean bean object with the property.
	 * @param array		$property	Lagan model property arrray.
	 * @param string	$new_value	The password.
	 *
	 * @return string	The new password hash.
	 */
	public function set($bean, $property, $new_value) {

		if (
			$bean->{ $property['name'] } !== $new_value
			&&
			!empty($new_value)
		) {

			if ( isset( $property['validate'] ) ) {

				$validator = new Validator();
				$validator->add( [ $property['name'] => $property['validate'] ] ); // Validator rule(s) need to be an array

				if ( !$validator->validate( [ $property['name'] => $new_value ] ) ) { // Validator needs an array as input
					$messages = $validator->getMessages();
					throw new \Exception( $property['description'] . ' validation error. ' . implode( ', ', $messages[ $property['name'] ] ) );
				}

			}

			$hashed_password = password_hash( $new_value, PASSWORD_DEFAULT );

			if ( $hashed_password ) {
				return $hashed_password;
			} else {
				throw new \Exception('Error hashing '.$property['description'].'.');
			}

		} else {
			return $bean->{ $property['name'] };
		}

	}

}

?>