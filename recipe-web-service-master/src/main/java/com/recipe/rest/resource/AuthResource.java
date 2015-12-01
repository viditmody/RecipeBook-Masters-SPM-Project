/*************************************************************************
 * Copyright (c) Metabiota Incorporated - All Rights Reserved
 * ------------------------------------------------------------------------
 * This material is proprietary to Metabiota Incorporated. The
 * intellectual and technical concepts contained herein are proprietary
 * to Metabiota Incorporated. Reproduction or distribution of this
 * material, in whole or in part, is strictly forbidden unless prior
 * written permission is obtained from Metabiota Incorporated.
 * ***********************************************************************
 * <p/>
 * Created by WLao on 11/12/15.
 */
package com.recipe.rest.resource;

import com.fasterxml.jackson.databind.DeserializationFeature;
import com.fasterxml.jackson.databind.SerializationFeature;
import com.fasterxml.jackson.jaxrs.annotation.JacksonFeatures;
import com.recipe.rest.common.enums.ServiceOperation;
import com.recipe.rest.dto.User;
import com.recipe.rest.entity.UserDO;
import com.recipe.rest.service.user.UserMapper;
import com.recipe.rest.service.user.UserService;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;

import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;
import javax.ws.rs.*;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

@Slf4j
@Produces({MediaType.APPLICATION_JSON})
@Consumes({MediaType.APPLICATION_JSON})
@Resource
@Path("auth")
public class AuthResource {

    @Autowired
    private UserService userService;

    @Autowired
    private UserMapper userMapper;

    @POST
    @JacksonFeatures(serializationEnable = SerializationFeature.WRAP_ROOT_VALUE,
            deserializationEnable = DeserializationFeature.UNWRAP_ROOT_VALUE)
    @Path("login")
    @Consumes({MediaType.APPLICATION_FORM_URLENCODED})
    public User authenticate(@FormParam("username") String username, @FormParam("password") String password) throws Exception {
        UserDO userDO = userService.findByUsername(username);
        if (userDO == null) {
            throw new WebApplicationException(Response.Status.UNAUTHORIZED);
        } else {
            if (!userDO.getPassword().equalsIgnoreCase(password)) {
                throw new WebApplicationException(Response.Status.UNAUTHORIZED);
            }
        }
        return userMapper.mapToDTO(userDO, ServiceOperation.GET);
    }

    @GET
    @Path("logout")
    public Response logout(@Context HttpServletRequest request) {
        request.getSession().invalidate();
        return Response.ok().build();
    }
}
