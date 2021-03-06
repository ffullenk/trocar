<?php

/**
 * BasesfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $username
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $sfGuardUserPermission
 * @property Doctrine_Collection $sfGuardUserGroup
 * @property sfGuardRememberKey $RememberKeys
 * @property sfGuardForgotPassword $ForgotPassword
 * @property sfGuardUserProfile $Profile
 * @property Doctrine_Collection $Havelist
 * @property Doctrine_Collection $Wantlist
 * @property Reputation $Reputation
 * @property Doctrine_Collection $Trades
 * @property Doctrine_Collection $Rated
 * @property Doctrine_Collection $Rates
 * 
 * @method string                getUsername()              Returns the current record's "username" value
 * @method string                getAlgorithm()             Returns the current record's "algorithm" value
 * @method string                getSalt()                  Returns the current record's "salt" value
 * @method string                getPassword()              Returns the current record's "password" value
 * @method boolean               getIsActive()              Returns the current record's "is_active" value
 * @method boolean               getIsSuperAdmin()          Returns the current record's "is_super_admin" value
 * @method timestamp             getLastLogin()             Returns the current record's "last_login" value
 * @method Doctrine_Collection   getGroups()                Returns the current record's "Groups" collection
 * @method Doctrine_Collection   getPermissions()           Returns the current record's "Permissions" collection
 * @method Doctrine_Collection   getSfGuardUserPermission() Returns the current record's "sfGuardUserPermission" collection
 * @method Doctrine_Collection   getSfGuardUserGroup()      Returns the current record's "sfGuardUserGroup" collection
 * @method sfGuardRememberKey    getRememberKeys()          Returns the current record's "RememberKeys" value
 * @method sfGuardForgotPassword getForgotPassword()        Returns the current record's "ForgotPassword" value
 * @method sfGuardUserProfile    getProfile()               Returns the current record's "Profile" value
 * @method Doctrine_Collection   getHavelist()              Returns the current record's "Havelist" collection
 * @method Doctrine_Collection   getWantlist()              Returns the current record's "Wantlist" collection
 * @method Reputation            getReputation()            Returns the current record's "Reputation" value
 * @method Doctrine_Collection   getTrades()                Returns the current record's "Trades" collection
 * @method Doctrine_Collection   getRated()                 Returns the current record's "Rated" collection
 * @method Doctrine_Collection   getRates()                 Returns the current record's "Rates" collection
 * @method sfGuardUser           setUsername()              Sets the current record's "username" value
 * @method sfGuardUser           setAlgorithm()             Sets the current record's "algorithm" value
 * @method sfGuardUser           setSalt()                  Sets the current record's "salt" value
 * @method sfGuardUser           setPassword()              Sets the current record's "password" value
 * @method sfGuardUser           setIsActive()              Sets the current record's "is_active" value
 * @method sfGuardUser           setIsSuperAdmin()          Sets the current record's "is_super_admin" value
 * @method sfGuardUser           setLastLogin()             Sets the current record's "last_login" value
 * @method sfGuardUser           setGroups()                Sets the current record's "Groups" collection
 * @method sfGuardUser           setPermissions()           Sets the current record's "Permissions" collection
 * @method sfGuardUser           setSfGuardUserPermission() Sets the current record's "sfGuardUserPermission" collection
 * @method sfGuardUser           setSfGuardUserGroup()      Sets the current record's "sfGuardUserGroup" collection
 * @method sfGuardUser           setRememberKeys()          Sets the current record's "RememberKeys" value
 * @method sfGuardUser           setForgotPassword()        Sets the current record's "ForgotPassword" value
 * @method sfGuardUser           setProfile()               Sets the current record's "Profile" value
 * @method sfGuardUser           setHavelist()              Sets the current record's "Havelist" collection
 * @method sfGuardUser           setWantlist()              Sets the current record's "Wantlist" collection
 * @method sfGuardUser           setReputation()            Sets the current record's "Reputation" value
 * @method sfGuardUser           setTrades()                Sets the current record's "Trades" collection
 * @method sfGuardUser           setRated()                 Sets the current record's "Rated" collection
 * @method sfGuardUser           setRates()                 Sets the current record's "Rates" collection
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_login');
        $this->hasColumn('username', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('algorithm', 'string', 128, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardGroup as Groups', array(
             'refClass' => 'sfGuardUserGroup',
             'local' => 'user_id',
             'foreign' => 'group_id'));

        $this->hasMany('sfGuardPermission as Permissions', array(
             'refClass' => 'sfGuardUserPermission',
             'local' => 'user_id',
             'foreign' => 'permission_id'));

        $this->hasMany('sfGuardUserPermission', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserGroup', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardForgotPassword as ForgotPassword', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardUserProfile as Profile', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('Havelist', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('Wantlist', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('Reputation', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('Trade as Trades', array(
             'local' => 'id',
             'foreign' => 'user_1_id'));

        $this->hasMany('Rate as Rated', array(
             'local' => 'id',
             'foreign' => 'user_rated_id'));

        $this->hasMany('Rate as Rates', array(
             'local' => 'id',
             'foreign' => 'user_rater_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}