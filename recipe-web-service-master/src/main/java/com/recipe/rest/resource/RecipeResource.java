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
import com.recipe.rest.dto.Recipe;
import com.recipe.rest.service.recipe.RecipeService;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;

import javax.annotation.Resource;
import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;
import java.util.List;
import java.util.Map;

@Slf4j
@Produces({MediaType.APPLICATION_JSON})
@Consumes({MediaType.APPLICATION_JSON})
@Resource
@Path("recipes")
public class RecipeResource {
    @Autowired
    private RecipeService recipeService;

    @GET
    @JacksonFeatures(serializationEnable = SerializationFeature.WRAP_ROOT_VALUE,
            deserializationEnable = DeserializationFeature.UNWRAP_ROOT_VALUE)
    @Path("{id}")
    public Recipe getById(@PathParam("id") Integer id) throws Exception {
        return recipeService.findById(id);
    }

    @GET
    public Map<String, List<Recipe>> getAll() throws Exception {
        return recipeService.findAll();
    }

    @POST
    @JacksonFeatures(serializationEnable = SerializationFeature.WRAP_ROOT_VALUE,
            deserializationEnable = DeserializationFeature.UNWRAP_ROOT_VALUE)
    public Recipe create(Recipe recipeDTO) throws Exception {
        return recipeService.add(recipeDTO);
    }

    @PUT
    @Path("{id}")
    public void update(@PathParam("id") Integer itemId, Recipe recipeDTO) throws Exception {
        recipeService.update(itemId, recipeDTO);
    }

//    @DELETE
//    @Path("{id}")
//    public void delete(@PathParam("id") Integer itemId) throws Exception {
//        recipeService.delete(itemId);
//    }
}
