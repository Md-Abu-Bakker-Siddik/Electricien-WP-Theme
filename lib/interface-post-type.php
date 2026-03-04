<?php
namespace MascotCoreElectricien\Lib;

/**
 * interface Mascot_Core_Electricien_Interface_PostType
 * @package MascotCoreElectricien\Lib;
 */
interface Mascot_Core_Electricien_Interface_PostType {
	/**
	 * Returns PT Key
	 * @return string
	 */
	public function getPTKey();

	/**
	 * It registers custom post type
	 */
	public function register();
}